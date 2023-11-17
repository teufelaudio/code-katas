var wordWrapper = function (inputString, characterLimit) {
    var splittedWord = inputString.split(' ');
    var outputWord = '';
    var outputArray = [];
    for (var i = 0; i < splittedWord.length; i++) {
        outputWord += splittedWord[i];
        if (outputWord.length >= characterLimit) {
            outputArray.push(outputWord + ' ');
            outputWord = '';
        }
    }
    return outputArray.join('\n');
};
module.exports = { wordWrapper: wordWrapper };
