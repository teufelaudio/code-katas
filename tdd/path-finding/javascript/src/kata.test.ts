import RenameMe from './kata';

describe('Topic name', () => {
    describe('Rename to what we are describing', () => {
        it('rename to the first behaviour we want to describe', () => {
            const renameMe = new RenameMe();

            expect(renameMe.doNothing()).toEqual(false)
        });

        // Add more examples for other behaviours
    });
});
