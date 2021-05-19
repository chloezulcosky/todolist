import {Component} from "@angular/core";
import {ITask} from "../tasks";
import {UserSettings} from "../tasks";
import {TaskService} from "../task.service";
import {NgForm} from "@angular/forms";
import {Router} from "@angular/router";

@Component({
  templateUrl: 'add-task.component.html',
  styleUrls: ['add-task.component.css']
})
export class AddTaskComponent {
  tasks: ITask[] = [];
  userSettings: UserSettings = {
    tName: '',
    tDescription: ''
  }
  constructor(private taskService: TaskService, private router: Router) { }

  addTask(form: NgForm): void {
    this.taskService.postForm(this.userSettings).subscribe({
      next: $result => {
        this.router.navigate(['/tasks']);
       },
      error: err => console.error('error')
    });
  }

  onTasks() : void {
    this.router.navigate(['/tasks']);
  }
}
