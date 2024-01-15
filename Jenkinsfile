pipeline {
    agent any
    
    environment {
        // Use a dynamic value for the image tag, for example, the Jenkins build number
        IMAGE_TAG = "v1.${BUILD_NUMBER}"
        DOCKER_REPO = "yahya4246/jenkins-image"
        k8s_server = "http://127.0.0.1:45263/"
    }
    stages{
        stage('Build docker image'){
            steps{
                script{
                    sh 'docker build -t ${DOCKER_REPO}:${IMAGE_TAG} .'
                }
            }
        }
        stage('Push image to Hub'){
            steps{
                script{
                   withCredentials([string(credentialsId: 'dockerhub-pwd', variable: 'dockerhubpwd')]) {
                   sh 'docker login -u yahya4246 -p ${dockerhubpwd}'

}
                   sh 'docker push ${DOCKER_REPO}:${IMAGE_TAG}'
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
  
        withCredentials([
            string(credentialsId: 'my_kubernetes', variable: 'api_token')
            ]) {
             sh 'kubectl --token $api_token --server ${k8s_server}  --insecure-skip-tls-verify=true apply -f deployment.yaml '
               }
            }
}
        
    }
}











