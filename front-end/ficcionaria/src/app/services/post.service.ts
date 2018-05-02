import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Post } from '../model/post';
import { Http, Headers, Response } from '@angular/http';

@Injectable()
export class PostService {

  constructor(private http: Http) {
  }

  public list() {
    this.http.get('http://api-ficcionaria/posts')
      .subscribe((res) => {
        console.log(res)
        const posts = res.json();
        console.log(posts);

      });
  }

}
