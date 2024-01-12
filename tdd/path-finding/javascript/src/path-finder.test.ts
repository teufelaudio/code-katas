import PathFinder from './path-finder';

describe('The path finder ', () => {
    it('returns nothing if current location and nearest safe place is (0,0)', () => {
        const pathFinder = new PathFinder();

        expect(pathFinder.findNearestSafePlace('0,0')).toEqual('')
    });

    // Add more examples for other behaviours
});
