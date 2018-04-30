import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ViewProfileComponent } from '../../components/profile/view-profile/view-profile.component';
import { ListProfileComponent } from '../../components/profile/list-profile/list-profile.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [ViewProfileComponent, ListProfileComponent],
  exports: [ViewProfileComponent, ListProfileComponent]
})
export class ProfileModule { }
