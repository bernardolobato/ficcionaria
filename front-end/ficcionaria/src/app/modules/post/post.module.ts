import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SavePostComponent } from '../../components/post/save-post/save-post.component';
import { FormsModule } from '@angular/forms';
import { MaterialModule } from './../material-module';
import { ViewPostComponent } from '../../components/post/view-post/view-post.component';
import { ListPostComponent } from '../../components/post/list-post/list-post.component'

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    MaterialModule
  ],
  declarations: [SavePostComponent, ViewPostComponent, ListPostComponent],
  exports: [SavePostComponent, ViewPostComponent, ListPostComponent]
})
export class PostModule { }
