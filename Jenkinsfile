node {
    checkout scm

    docker.image('kyo88kyo/blog').inside {
        stage('Test') {
            sh 'php --version'
            sh 'cd /var/www/blog && ./vendor/bin/phpunit --testsuite Unit'
        }
    }

    stage('Deploy') {
        sh 'docker rm $(docker ps -aq)'
        sh 'cd src && docker-compose up'
        sh 'docker ps'
    }
}