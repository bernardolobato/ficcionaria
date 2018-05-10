import { Component, OnInit } from '@angular/core';
import { Post } from '../../../model/post';
import { PostService } from '../../../services/post.service';

@Component({
  selector: 'app-post-form',
  templateUrl: './post-form.component.html',
  styleUrls: ['./post-form.component.css']
})
export class PostFormComponent implements OnInit {
  post: Post = new Post();

  constructor(private service: PostService) { }

  ngOnInit() {
  }


  saveAndPublish() {
    this.post.status = 'ATIVO';
    console.log(this.post);
    this.post.teaser = this.post.text.substring(1,280);
    this.service.save(this.post).subscribe((ret) => {
      console.log(ret);
    });
  }

}
