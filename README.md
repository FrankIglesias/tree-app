## About this project
This has a frontend made with vue and a backend with php and supabase as db.
Supabase is a tool that creates postgres databases for free.

If you want to see the final result of the project please go to https://tree-backend.vercel.app/api


The frontend is also deployed on Vercel.

## Considerations
I had to import the build hash manually to the template... I would have make an automated CI pipeline that set those hashes automatically instead.

I created one snapshot test but there are other interesting cases to cover: 
For e.g. What happens if there's no data in the global object.

## Local development
- To test the frontend locally please define in the global object some mock data.
