<?php
/**
 * Directions:
 * 1) Replace the <hairpined values below with meaningful data
 * 2) Rename this file: config.php
 */


//** Main Configuration Section **\\

$TEST_HOSTNAME = 'sidewalk-test.cs.washington.edu'; //The FQDN of the test server
$PROD_HOSTNAME = 'sidewalk.cs.washington.edu'; //The FQDN of the production server

#Usually at the root of a site, don't change unless you're sure
$TEST_PATH = '/'; //The url path where the test application is hosted, please terminate path with a slash
$PROD_PATH = '/'; //The url path where the production application is hosted, please terminate path with a slash

$TEST_MODE = 'master'; //'branch name' OR keyword 'TAG
$PROD_MODE = 'TAG'; //'branch name' OR keyword 'TAG'

$AUTO_DEPLOY_REPO_URL = 'git@github.com:mechanicjay/sidewalk-docker.git'; //the ssh repo url of your auto-deploy aproject

$USE_DOCKER = TRUE; // Set to FALSE for just doing code pulls without a docker container

/***
  * Only modify below here if you are using Docker
  */

$MAIL_CONTAINER_BUILD_RESULTS = FALSE; //Controls sending of docker build output to a configured email address;

$SEND_MAIL_TO = '';  //The configured email address(es), comma separated, referenced above



//** Auxiliary Configuration Section **\\

/**
 * If you have more than one container to deploy, 
 * please contact support for futher consultation as there are a several options
 * depending on needs and architecture.
 */

$SUBMODULE_PATH = ''; //If you've a git submodule for your containers, enter the relative path here, else ignore

$SUBMODULE_REPO_URL = ''; //If you have a git submodule for your container, enter the repo url here, else ignore


//*** DO NOT MODIFY ANYTHING BELOW THIS LINE ***\\
DEFINE('DEPLOY_KEY', '/var/www/.ssh/id_rsa');
DEFINE('LOG_FILE', "/var/log/auto-deploy/{$PROD_HOSTNAME}.txt");

$BASE_DIR = "/var/www/vhosts/{$PROD_HOSTNAME}"; 

$ALLOWED_HTTP_METHODS = ['GET', 'POST'];

$DEPLOY_TRIGGERS = ['Push Hook', 'Tag Push Hook', 'push'];


// Which repos do we support, keyed on URL.  No trailing slash on 'deploy_to'.
$DEFINED_REPOS = array( 
    $AUTO_DEPLOY_REPO_URL => array(
        'deploy_to' => $BASE_DIR,
        'containers' => $CONTAINER_NAME
	),
    
    $SUBMODULE_REPO_URL => array(
    	'deploy_to' => $BASE_DIR.'/'.$SUBMODULE_PATH,
	'containers' => $CONTAINER_NAME
	)
	
     );

