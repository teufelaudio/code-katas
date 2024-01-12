export default class FinancialDataProcessor {
    private data: number[] = [];

    constructor(initialData: number[]) {
        this.data = initialData;
    }

    processData() {
        let sum = 0;
        for (let i = 0; i < this.data.length; i++) {
            sum += this.data[i];
        }
        const average = sum / this.data.length;

        let max = this.data[0];
        let min = this.data[0];
        for (let i = 1; i < this.data.length; i++) {
            if (this.data[i] > max) {
                max = this.data[i];
            }
            if (this.data[i] < min) {
                min = this.data[i];
            }
        }

        return {
            average,
            max,
            min,
        };
    }
}
