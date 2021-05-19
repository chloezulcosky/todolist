import {Component, OnInit} from "@angular/core";
import {ITask} from "../tasks";
import {TaskService} from "../task.service";
import {Router} from "@angular/router";

@Component({
  templateUrl: './task-list.component.html',
  styleUrls: ['./task-list.component.css']
})
export class TaskListComponent implements OnInit {
  tasks: ITask[] = [];
  showDescription: boolean = false;
  constructor(private taskService: TaskService, private router: Router) { }

  showTasks(): void {
    this.taskService.getTasks().subscribe({
      next: tasks => {
        this.tasks = tasks;
        console.log(tasks);
      },
      error: err  => console.log(err)});
  }

  ngOnInit(): void {
    this.showTasks();
  }

  deleteTask(taskID: number): void {
    this.taskService.deleteTask(taskID).subscribe({
      next: () => this.showTasks(),
      error: err => console.error(err)
    });
  }

 changeStatus(task): void {
    this.taskService.changeStatus(task).subscribe({
        next: () => this.showTasks(),
        error: err => console.error(err)
      });
    }

   onHome(): void {
    this.router.navigate(['/welcome']);
  }

  toggleDescriptions(): void {
    this.showDescription = !this.showDescription;
  }
}
