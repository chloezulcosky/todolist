import { Injectable } from "@angular/core";
import {ITask, UserSettings} from "./tasks";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Observable} from "rxjs";
import {tap} from "rxjs/operators";

@Injectable({
  providedIn: 'root'
})

export class TaskService {
  private taskFile = 'http://localhost:8000';
  constructor(private http: HttpClient) {}

  getTasks(): Observable<ITask[]> {
    return this.http.get<ITask[]>(this.taskFile).pipe(
      tap(data => console.log('All: ', JSON.stringify(data)))
    );
  }

  deleteTask(deleteID: number): Observable<void> {
    const header = new HttpHeaders({'Content-Type': 'application/json'});
    const url = `${this.taskFile}/${deleteID}`;
    return this.http.delete<void>(url);
  }

  changeStatus(task: ITask): Observable<void> {
    const header = new HttpHeaders({'Content-Type': 'application/json'});
    const url = `${this.taskFile}/${task.taskID}`;
    return this.http.put<void>(url, task);
  }

  postForm(userSettings: UserSettings): Observable<UserSettings> {
    const header = new HttpHeaders({'Content-Type': 'application/json'});
    return this.http.post<UserSettings>(this.taskFile, userSettings);
  }


}
