node {
    checkout scm

    stage('Build') {
        checkout scm
        sh 'echo ${USER}'
        sh 'pwd && cd src && /usr/local/bin/composer install'
        docker.build("kyo88kyo/nginx", "-f Dockerfile-nginx .")
        docker.build("kyo88kyo/blog")
    }

    stage('Test') {
        docker.image('kyo88kyo/blog').inside {
            sh 'php --version'
            sh 'cd /var/www/blog && ./vendor/bin/phpunit --testsuite Unit'
        }
    }

    stage('Deploy') {
        sh 'cd src && docker-compose down'
        sh 'cd src && docker-compose up -d'
        sh 'sleep 10 && cd src && docker-compose run web php artisan migrate'
    }

    stage ('Test Feature') {
        sh 'cd src && docker-compose run web ./vendor/bin/phpunit --testsuite Feature'
    }
}