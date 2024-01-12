export default class PathFinder {
    constructor() {
    }

    findNearestSafePlace(x: number, y: number ) {
        let instruction: string = '';

        const east = 'E';
        const north = 'N';
        const south = 'S';
        const west = 'W';
        
        if (x > 0) {
            instruction = instruction + east.repeat(x);
        } else {
            instruction = instruction + west.repeat(x * -1)
        }
        
        if (y > 0) {
            instruction = instruction + north.repeat(y);
        } else {
            instruction = instruction + south.repeat(y * -1)
        }

        return instruction;
    }
}
