const { createApp } = Vue;

createApp({
  data() {
    return {
      todos: [],
      newTask: "",
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
  methods: {
    addTask() {
      axios
        .post(
          "http://localhost:8888/PHP%20ToDo%20List%20JSON/php-todo-list-json/backend/create_task.php",
          {
            task: this.newTask,
          },
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((res) => {
          if (res.data.code == 200) {
            this.todos.push({
              todo: this.newTask,
              done: false,
            });
            this.newTask = "";
          } else if (res.data.code == 400) {
            alert(res.data.message);
          }
        });
    },
    isDoneOrIsNotDone(i) {
      axios
        .post(
          "http://localhost:8888/PHP%20ToDo%20List%20JSON/php-todo-list-json/backend/change_status.php",
          {
            index: i,
          },
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((res) => {
          if (res.data.code == 200) {
            this.todos[i].done = !this.todos[i].done;
          }
        });
    },
  },
}).mount("#app");
