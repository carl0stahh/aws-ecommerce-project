pipeline {
    agent any

    environment {
        IMAGE_NAME = 'aws-ecommerce'
        BUILD_TAG = "build-${BUILD_NUMBER}"
    }

    stages {

        stage('Checkout') {
            steps {
                echo "Cloning repo..."
                git branch: 'main', url: 'https://github.com/carl0stahh/aws-ecommerce-project.git'
                sh 'ls -la'
            }
        }

        stage('Inspect') {
            steps {
                sh 'echo "Branch: $(git rev-parse --abbrev-ref HEAD)"'
                sh 'echo "Commit: $(git rev-parse --short HEAD)"'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo "Building ${IMAGE_NAME}:${BUILD_TAG}..."
                sh 'docker build -t ${IMAGE_NAME}:${BUILD_TAG} .'
            }
        }

        stage('Verify Container') {
            steps {
                sh 'docker run -d --name test-container -p 8090:80 ${IMAGE_NAME}:${BUILD_TAG}'
                sh 'sleep 3'
                sh 'docker ps | grep test-container'
                sh 'docker stop test-container && docker rm test-container'
                echo "Container verified!"
            }
        }

    }

    post {
        success {
            echo "✅ SUCCESS — ${IMAGE_NAME}:${BUILD_TAG} is ready!"
            sh 'docker images | grep ${IMAGE_NAME}'
        }
        failure {
            echo "❌ FAILED — check logs above"
            sh 'docker rm -f test-container || true'
        }
        always {
            echo "Build #${BUILD_NUMBER} finished."
        }
    }
}
