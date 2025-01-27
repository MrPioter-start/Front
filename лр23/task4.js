let room = {
    number: 101,
    toJSON() {
        return `Комната №${this.number}`;
    },
};
console.log(JSON.stringify(room));
