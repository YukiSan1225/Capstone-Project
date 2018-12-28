pipeline{
    agent any any
    stages{
        stage('Adding changes to github'){
            sh 'cd /Users/damien/Documents/Capstone-Project && git add .'
        }
        stage('Committing changes'){
            sh 'cd /Users/damien/Documents/Capstone-Project && git commit -m "Testing Pipeline"'
        }
        stage('Pushing to github'){
            sh 'cd /Users/damien/Documents/Capstone-Project && git push'
        }
    }
}