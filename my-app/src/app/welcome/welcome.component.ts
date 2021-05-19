import {Component} from '@angular/core';

@Component({
  templateUrl: './welcome.component.html',
  styleUrls: ['welcome.component.css']
})
export class WelcomeComponent {
  public pageTitle = "Welcome";
  public displayMessage = "Manage your tasks using the navigation bar above.";
}
