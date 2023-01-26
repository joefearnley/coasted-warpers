import inquirer from 'inquirer';
import { shuffle } from 'fast-shuffle';
import chalkPipe from 'chalk-pipe';

const questions = [
    {
        type: 'input',
        name: 'length',
        message: 'Password Length (default 20)?',
        default() {
            return '20';
        },
        validate(value) {
            const length = parseInt(value);
            if (!isNaN(length)) {
                return true;
            }

            return 'Please enter a valid number.';
          },
    },
    {
        type: 'confirm',
        name: 'useSpecialCharacters',
        message: 'Use special characters (Y/n)?',
        default() {
            return 'Y';
        },
    },
];

inquirer.prompt(questions).then((answers) => {
    const length = parseInt(answers.length);
    const useSpecialCharacters = answers.useSpecialCharacters;

    let characters = 'abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ1234567890';
    if (useSpecialCharacters ) {
        characters += '!@#$%^&*()+;';
    }

    let charactersArray = characters.split('');
    charactersArray = shuffle(charactersArray);
    charactersArray = shuffle(charactersArray);

    let password = '';
    for(let i = 0; i < length; i++) {
        password += charactersArray[i];
    }

    console.log("\n");
    console.log(`New Password: ${chalkPipe('blue.bold')(password)}`);
    console.log("\n");
  });

