Team Mauve

Link to our website: https://jay.dominicswaine.com/

Team Members:
- Sophie Biber - K1763969
- Marta Krawczyk - K1763622
- Tao Lin - K1763808
- Jay Macpherson - K1764023
- Abdulqadir Safiyuddin - K1763516

Our project has borrowed ideas from the Lynda.com tutorials linked from the SEG Lab Project page.

Furthermore, we used Laravel. 

Using Laravel:

Using the Laravel framework greatly improved the quality of our project. It allowed us to utilise the MVC architecture, and separate different components of our system to ensure looser coupling between classes and ensure high cohesion in that each class is responsible for distinct roles. By taking care of the authentication system, all we had to was re-route the user to register a new volunteer if they had sufficient permissions such as the secretary. With password hashing and the ability to query the Auth model we were able to impact the security on a much higher level than achievable otherwise. 

Laravel also allowed us to increase workflow by allowing for migrations and seeding of our local databases for testing, which was extremely valuable for each of the members of the team as we continuously attempted to break and fix the project. 

Query building in Laravel works slightly differently, but was not difficult to become accustomed with. As a result some of the complex pure sql we wrote became trivial with relationships, and controller methods could be called within the view for submitting forms, or custom methods as long as they were routed.

Passing in information to the views was relatively painless using controllers. We could send a collection through to a page and iterate over that in order to obtain the information that we needed. Even for slightly more advanced pages we could build a nested array which then could be accessed via key value pair.

In summary, Laravel presented a sizeable entry level barrier to our team, but we decided that for the quality of the project, the benefits heavily outweighed the effort required to learn it.
