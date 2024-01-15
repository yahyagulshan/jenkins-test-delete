pipeline {
    agent any
    
    
    stages{
        stage('Build docker image'){
            steps{
                script{
                    sh 'docker build -t yahya4246/jenkins-image .'
                }
            }
        }
        stage('Push image to Hub'){
            steps{
                script{
                   withCredentials([string(credentialsId: 'dockerhub-pwd', variable: 'dockerhubpwd')]) {
                   sh 'docker login -u yahya4246 -p ${dockerhubpwd}'

}
                   sh 'docker push yahya4246/jenkins-image:{{IMAGE_TAG}}'
                }
            }
        }
        
        stage('Deploy App on k8s') {
      steps {
          {
                def imageTag = "v1.${BUILD_NUMBER}"  // Replace with your versioning strategy
                sh "sed -i 's/{{IMAGE_TAG}}/${imageTag}/' deployment.yaml"
            }
        withCredentials([
            string(credentialsId: 'my_kubernetes', variable: 'api_token')
            ]) {
             sh 'kubectl --token $api_token --server http://127.0.0.1:45263/  --insecure-skip-tls-verify=true apply -f deployment.yaml '
               }
            }
}
        
    }
}






