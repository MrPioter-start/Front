let meetup = {
    title: "Conference",
    participants: [{ name: "John" }, { name: "Alice" }],
    secret: "не войдёт в JSON",
};
let json = JSON.stringify(meetup, ["title", "participants", "name"]);
console.log(json);
