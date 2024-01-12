import PathFinder from './path-finder';

describe('The path finder ', () => {
    it('returns nothing if current location and nearest safe place is (0,0)', (): void => {
        const pathFinder = new PathFinder();

        expect(pathFinder.findNearestSafePlace(0, 0)).toEqual('');
    });

    it('returns "E" if current location is (0,0) and nearest safe place is (1,0)', (): void => {
        const pathFinder = new PathFinder();

        expect(pathFinder.findNearestSafePlace(1, 0)).toEqual('E');
    });

    it('returns "EN" if current location is (0,0) and nearest safe place is (1,1)', (): void => {
        const pathFinder = new PathFinder();

        expect(pathFinder.findNearestSafePlace(1, 1)).toEqual('EN');
    });
});
