let str = '{"title":"Совещание","date":"2025-10-05T12:00:00.000Z"}';
let meetup = JSON.parse(str, (key, value) => {
    return key === "date" ? new Date(value) : value;
});
console.log(meetup.date.getFullYear());
