import FinancialDataProcessor from './kata';

describe('FinancialDataProcessor', () => {
    describe('processData', () => {
        it('calculates average, max, and min correctly', () => {
            const dataProcessor = new FinancialDataProcessor([10, 20, 30, 40, 50]);
            const processedData = dataProcessor.processData();

            expect(processedData).toEqual({
                average: 30,
                max: 50,
                min: 10,
            });
        });

        it('handles empty input data', () => {
            const dataProcessor = new FinancialDataProcessor([]);
            const processedData = dataProcessor.processData();

            expect(processedData).toEqual({
                average: NaN,
                max: undefined,
                min: undefined,
            });
        });

        // Add more test cases for edge cases, invalid input, etc.
    });
});
