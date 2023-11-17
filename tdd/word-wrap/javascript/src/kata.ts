const wordWrapper = function(inputString:string): string {

    const splittedWord = inputString.split(' ');
    //outputString = splittedWord.join('\n');

    return splittedWord.join('\n');
};

module.exports = {wordWrapper};
