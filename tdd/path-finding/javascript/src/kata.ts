import type {Point} from './point';
export default class Pathfinder {
    constructor() {
    }

    provideDirections(start: Point, end: Point) {
        return this.createDirections(start, end, "")
    }

    createDirections(start: Point, end: Point, route: string): string {
        if (start.x == end.x && start.y == end.y) {
            return route
        }

        if (end.y > start.y) {
            return this.createDirections({x: start.x, y: start.y + 1}, end, route + "N")
        }

        if (end.y < start.y) {
            return this.createDirections({x: start.x, y: start.y - 1}, end, route + "S")
        }

        if (end.x > start.x) {
            return this.createDirections({x: start.x + 1, y: start.y}, end, route + "E")
        }

        if (end.x < start.x) {
            return this.createDirections({x: start.x - 1, y: start.y}, end, route + "W")
        }

        return ""
    }
}
