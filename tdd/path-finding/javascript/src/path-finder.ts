export default class RenameMe {
    constructor() {
    }

    findNearestSafePlace(x: number, y: number ) {
        let instruction: string = '';

        if (x != 0) {
            instruction = instruction + 'E';
        }

        if (y != 0) {
            instruction = instruction + 'N';
        }

        return instruction;
    }
}
