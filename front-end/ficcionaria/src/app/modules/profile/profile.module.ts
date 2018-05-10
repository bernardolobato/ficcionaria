import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ViewProfileComponent } from '../../components/profile/view-profile/view-profile.component';
import { ListProfileComponent } from '../../components/profile/list-profile/list-profile.component';
import { HomeComponent } from '../../components/home/home.component';
import { LayoutModule } from '../layout/layout.module';
import { RouterModule } from '@angular/router';
import { PostModule } from '../post/post.module';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { FormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    RouterModule,
    LayoutModule,
    PostModule,
    NgbModule,
    FormsModule
  ],
  declarations: [ViewProfileComponent, ListProfileComponent],
  exports: [ViewProfileComponent, ListProfileComponent]
})
export class ProfileModule { }
