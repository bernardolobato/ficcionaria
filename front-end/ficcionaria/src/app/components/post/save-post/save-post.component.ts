import { Component, OnInit } from '@angular/core';
import { Post } from '../../../model/post';
import { MatFormField } from '@angular/material';

@Component({
  selector: 'app-save-post',
  templateUrl: './save-post.component.html',
  styleUrls: ['./save-post.component.css']
})
export class SavePostComponent implements OnInit {

  post: Post;
  status;
  constructor() {
    this.post = new Post();
    this.status = ['PUBLICADO', 'RASCUNHO']
  }

  ngOnInit() {
  }

}
