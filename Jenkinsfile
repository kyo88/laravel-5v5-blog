node {
    checkout scm

    docker.image('kyo88kyo/blog').inside {
        stage('Test') {
            sh 'php --version'
            sh 'cd /var/www/blog && ./vendor/bin/phpunit --testsuite Unit'
        }
    }


    stage('Deploy') {
        //sh 'cd src && /usr/local/bin/docker-compose down'
        sh 'cd src && /usr/local/bin/docker-compose up -d'
        sh 'cd src && /usr/local/bin/docker-compose run web src/artisan migrate'
    }
}