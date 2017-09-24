# Elevator System Modelled in PHP, using a BDD approach

## Components used in the BDD approach:
- [Behat](http://behat.org)
- [PHPSpec](http://www.phpspec.net)
- [PHPSpec code coverage](https://github.com/leanphp/phpspec-code-coverage)
- [PHPUnit](https://phpunit.de)

## Installation

*Note: please make sure port `8080` is available on the network stack that you're using.*

The easiest way to run this project is using Docker. Once Docker's up and running, 
these simple steps will setup the project:

Clone the project somewhere on your computer:

    $ git clone https://github.com/stevepetcu/elevators.git
    
Switch to the newly created project directory: 

    $ cd ./elevators
    
Run docker-compose:

    - `$ docker-compose up -d`
    
Run composer install:

    $ docker run --rm --interactive --tty --volume $PWD:/app composer install
**Hint**: we run composer from the docker container, because the project requires 
at least PHP 7.1, and this relatively new versions is not always available locally

That's it! Check that the application is working at port `8080` of your docker's 
host, e.g., `http://localhost:8080`, for systems which support Docker natively.

## Running the tests

The tests must be run inside the dockerized phpfpm container. Don't worry, it's easy!

First of all, we have to find the name of the aforementioned container:

    $ docker inspect --format='{{.Name}}' $(docker ps -q) | grep elevators_phpfpm

should return the name that we want. Copy it (excluding the first `/`). We'll use 
`<elevators_phpfpm_container>` to refer to it.

### Running the Behat tests:
    $ docker exec <elevators_phpfpm_container> vendor/bin/behat
   
### Running the PHPSpec tests:
    $ docker exec <elevators_phpfpm_container> vendor/bin/phpspec run
    
### Coverage
PHPSpec will generate the coverage under the `./coverage` folder.

###Thanks for taking a look, and have fun!