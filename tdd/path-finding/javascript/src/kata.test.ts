import Pathfinder from './kata';

const pathfinder = new Pathfinder();

describe('Path finder', () => {
    describe('Step 1: Compass directions', () => {
        it('gives no directions if the destination matches the start point', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x: 0, y:0})).toEqual("")
        });

        it('gives directions for one step north', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x: 0, y:1})).toEqual("N")
        });

        it('gives directions for two steps north', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x: 0, y:2})).toEqual("NN")
        });

        it('gives directions for three steps north', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x: 0, y:3})).toEqual("NNN")
        });

        it('gives directions for three steps south', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x: 0, y:-3})).toEqual("SSS")
        });

        it('gives directions for three steps east', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x: 3, y:0})).toEqual("EEE")
        });

        it('gives directions for three steps west', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x:-3, y:0})).toEqual("WWW")
        });

        it('gives directions for two steps west and four steps south', () => {
            expect(pathfinder.provideDirections({x: 0, y:0}, {x:-2, y:-4})).toEqual("SSSSWW")
        });
    });
});
