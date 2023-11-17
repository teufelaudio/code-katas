var wordWrapper = function (inputString) {
    var splittedWord = inputString.split(' ');
    //outputString = splittedWord.join('\n');
    return splittedWord.join('\n');
};
module.exports = { wordWrapper: wordWrapper };
