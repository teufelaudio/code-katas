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
        return {
            average: this.getSum(this.data) / this.data.length,
            max: this.getMax(this.data),
            min: this.getMin(this.data)
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
        return numbers[0] ?? 0;
    }
}
