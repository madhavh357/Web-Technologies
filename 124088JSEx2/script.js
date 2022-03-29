function calculator()
{
    let name = prompt("Enter expression", "5+5");
    document.write("<h1 id='input'>"+name+" = <span style='background-color: red; color: white'>"+eval(name).toFixed(2)+"</span>"+"</h1>")
}