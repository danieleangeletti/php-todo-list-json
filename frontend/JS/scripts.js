const { createApp } = Vue;

createApp({
  data() {
    return {
      todos: [],
    };
  },
  mounted() {
    axios
      .get(
        "http://localhost:8888/PHP%20ToDo%20List%20JSON/php-todo-list-json/backend/todo.php"
      )
      .then((res) => {
        console.log(res.data);
        this.todos = res.data;
      });
  },
}).mount("#app");
