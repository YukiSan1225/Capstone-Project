pipeline{
    agent any
    stages{
        stage('Adding changes to github'){
            steps{
                dir('/Users/damien/Documents/Capstone-Project'){
                    sh 'git add .'
                }
            }
        }
        stage('Committing changes'){
            steps{
                sh 'cd /Users/damien/Documents/Capstone-Project && git commit -m "Testing Pipeline"'
            }
        }
        stage('Pushing to github'){
            steps{
                sh 'cd /Users/damien/Documents/Capstone-Project && git push'
            }
        }
    }
}