interface DataMetrics {
    average: number;
    max: number;
    min: number;
}

export default class FinancialDataProcessor {
    private data: number[] = [];

    constructor(initialData: number[]) {
        this.data = initialData;
    }

    processData(): DataMetrics {
        const average = this.getSum(this.data) / this.data.length;

        let max = this.getMax(this.data);
        let min = this.getMin(this.data);

        for (let i = 1; i < this.data.length; i++) {
            if (this.data[i] > max) {
                max = this.data[i];
            }
            if (this.data[i] < min) {
                min = this.data[i];
            }
        }

        return {
            average: average,
            max: max,
            min: min
        };
    }

    private getSum(numbers: number[]): number {
        return numbers.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
    }

    private getMax(numbers: number[]) {
        return numbers.reduce((accumulator, currentValue) => currentValue > accumulator ? currentValue : accumulator, 0);
    }

    private getMin(numbers: number[]) {
        return numbers.reduce(
            (accumulator, currentValue) => currentValue < accumulator ? currentValue : accumulator,
            this.getFirstValueOrZero(numbers)
        );
    }

    private getFirstValueOrZero(numbers: number[]) {
        return numbers.length > 0 ? numbers[0] : 0;
    }
}
