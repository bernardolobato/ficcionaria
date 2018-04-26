import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SavePostComponent } from '../../components/post/save-post/save-post.component';
import { FormsModule } from '@angular/forms';
import { MaterialModule } from './../material-module'

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    MaterialModule
  ],
  declarations: [SavePostComponent],
  exports: [SavePostComponent]
})
export class PostModule { }
