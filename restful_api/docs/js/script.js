const data = {
  name: "User 4",
  email: "user4@gmail.com",
  password: "123456",
};
fetch(`http://localhost:8000/api/v1/users`, {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify(data),
})
  .then((res) => res.json())
  .then((users) => {
    console.log(users);
  });
