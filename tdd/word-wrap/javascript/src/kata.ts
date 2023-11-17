const wordWrapper = function(inputString: string, characterLimit: number): string {

    const splittedWord = inputString.split(' ');

    let outputWord = '';
    let outputArray = [];

    for (let i = 0; i < splittedWord.length; i++) {
        let currentWord = splittedWord[i];

        // if outputWord + word >= limit, then do not concatenate

        outputWord += splittedWord[i]; // the cat sat

        if (outputWord.length > characterLimit) {
            outputArray.push(outputWord + ' ');
            outputWord = '';
        }
    }

    return outputArray.join('\n');
};

module.exports = {wordWrapper};
