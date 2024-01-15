pipeline {
    agent any
    
    environment {
        // Use a dynamic value for the image tag, for example, the Jenkins build number
        IMAGE_TAG = "v1.${BUILD_NUMBER}"
    }
    stages{
        stage('Build docker image'){
            steps{
                script{
                    sh 'docker build -t yahya4246/jenkins-image:${IMAGE_TAG} .'
                }
            }
        }
        stage('Push image to Hub'){
            steps{
                script{
                   withCredentials([string(credentialsId: 'dockerhub-pwd', variable: 'dockerhubpwd')]) {
                   sh 'docker login -u yahya4246 -p ${dockerhubpwd}'

}
                   sh 'docker push yahya4246/jenkins-image:${IMAGE_TAG}'
                }
            }
        }
        
        stage('Update deployment.yaml') {
            steps {
                // Update the deployment.yaml file with the dynamic image tag
                script {
                    sh "sed -i 's/{{IMAGE_TAG}}/${IMAGE_TAG}/' deployment.yaml"
                }
            }
        }

        stage('Deploy App on k8s') {
      steps {
        //   script {
        //         def imageTag = "v1.${BUILD_NUMBER}"  // Replace with your versioning strategy
        //         sh "sed -i 's/{{IMAGE_TAG}}/${imageTag}/' deployment.yaml"
        //     }
        withCredentials([
            string(credentialsId: 'my_kubernetes', variable: 'api_token')
            ]) {
             sh 'kubectl --token $api_token --server http://127.0.0.1:45263/  --insecure-skip-tls-verify=true apply -f deployment.yaml '
               }
            }
}
        
    }
}


#####################################

pipeline {
    agent any

    environment {
        IMAGE_TAG = "v1.${BUILD_NUMBER}"  // Customize this based on your versioning strategy
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                // Your build steps here (e.g., building Docker images)
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Update deployment.yaml with the new image tag
                    sh "sed -i 's/{{IMAGE_TAG}}/${IMAGE_TAG}/' deployment.yaml"

                    // Deploy to Kubernetes using kubectl apply
                    sh 'kubectl apply -f deployment.yaml'
                }
            }
        }

        stage('Post-build') {
            steps {
                // Any post-build steps
            }
        }
    }

    post {
        success {
            // Actions to be taken if the build is successful
            echo "Build and deployment to Kubernetes successful with image tag: ${IMAGE_TAG}"
        }
        failure {
            // Actions to be taken if the build fails
            echo 'Build or deployment to Kubernetes failed! Take corrective actions.'
        }
        always {
            // Actions to be taken regardless of build result
            echo 'Cleaning up...'
        }
    }
}






