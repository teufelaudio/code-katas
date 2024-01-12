import Pathfinder from './kata';

describe('Path finder', () => {
    describe('Step 1: Compass directions', () => {
        it('gives no directions if the destination matches the start point', () => {
            const pathfinder = new Pathfinder();

            expect(pathfinder.provideDirections(0,0,0,0)).toEqual("")
        });

        // Add more examples for other behaviours
    });
});
