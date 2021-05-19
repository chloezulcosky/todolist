import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import {HttpClientModule} from '@angular/common/http';
import {TaskListComponent} from "./tasks/task-list.component";
import {FormsModule} from "@angular/forms";
import {WelcomeComponent} from "./welcome/welcome.component";
import {RouterModule} from "@angular/router";
import {AddTaskComponent} from "./add/add-task.component";

@NgModule({
  declarations: [
    AppComponent,
    TaskListComponent,
    WelcomeComponent,
    AddTaskComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot([
      {path: 'tasks', component: TaskListComponent},
      {path: 'welcome', component: WelcomeComponent},
      {path: 'newtask', component: AddTaskComponent},
      {path: '', redirectTo: 'welcome', pathMatch: 'full'},
      {path: '**', redirectTo: 'welcome', pathMatch: 'full'},
    ])
    ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
