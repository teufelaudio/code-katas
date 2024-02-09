import FinancialDataProcessor from './kata';

describe('FinancialDataProcessor', () => {
    describe('max number', () => {
        it('is undefined if there is no input', () => {
            const dataProcessor = new FinancialDataProcessor([]);
            const processedData = dataProcessor.processData();

            expect(processedData.max).toEqual(undefined);
        });

        it('is the input number if there is only one', () => {
            const dataProcessor = new FinancialDataProcessor([42]);
            const processedData = dataProcessor.processData();

            expect(processedData.max).toEqual(42);
        });

        it('is the higher number if there are two', () => {
            const dataProcessor = new FinancialDataProcessor([42, 4321]);
            const processedData = dataProcessor.processData();

            expect(processedData.max).toEqual(4321);
        });
    });

    describe('min number', () => {
        it('is undefined if there is no input', () => {
            const dataProcessor = new FinancialDataProcessor([]);
            const processedData = dataProcessor.processData();

            expect(processedData.min).toEqual(undefined);
        });

        it('is the input number if there is only one', () => {
            const dataProcessor = new FinancialDataProcessor([42]);
            const processedData = dataProcessor.processData();

            expect(processedData.min).toEqual(42);
        });

        it('is the lower number if there are two', () => {
            const dataProcessor = new FinancialDataProcessor([42, 4321]);
            const processedData = dataProcessor.processData();

            expect(processedData.min).toEqual(42);
        });
    });
});
