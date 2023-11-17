export const format = function (
  inputText: string,
  columnWidth: number
): string {
  const words = inputText.split(" ");
  let output = "";

  words.forEach((word, index) => {
    if (index !== 0) {
      if (output.length + word.length > columnWidth) {
        output += "\n";
      } else {
        output += " ";
      }
    }
    output += word;
  });

  return output;
};
