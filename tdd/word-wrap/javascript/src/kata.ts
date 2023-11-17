export const format = function (
  inputText: string,
  columnWidth: number
): string {
  const words = inputText.split(" ");
  const lines = [];
  let currentLine = '';

  for (let word of words) {
    if (currentLine.length !== 0) {
      if (currentLine.length + 1 + word.length > columnWidth) {
        lines.push(currentLine);
        currentLine = word;
      } else {
        currentLine += ' ' + word;
      }
    } else {
        currentLine = word;
    }
  };

  if (currentLine.length !== 0) {
    lines.push(currentLine);
  }

  return lines.join('\n');
};
